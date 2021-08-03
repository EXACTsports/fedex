<?php

namespace EXACTSports\FedEx\Http\Services;

use EXACTSports\FedEx\OrderSubmissions\Request;
use EXACTSports\FedEx\Base\Contact;
use EXACTSports\FedEx\Base\PhoneNumberDetail;
use EXACTSports\FedEx\Base\Recipient;
use EXACTSports\FedEx\OrderSubmissions\Payment;
use EXACTSports\FedEx\DeliveryOptions\ProductAssociation;
use EXACTSports\FedEx\FedExTrait;

class OrderSubmission 
{
    use FedExTrait;

    public Request $request;
    public Contact $contact;
    public PhoneNumberDetail $phoneNumberDetail;
    public Recipient $recipient;

    public function __construct()
    {
        $this->request = new Request();
        $this->contact = new Contact();
        $this->phoneNumberDetail = new PhoneNumberDetail();
        $this->recipient = new Recipient();
    }

    /**
     * Gets order submission request
     */
    public function getRequest(array $documents, 
        array $contactInformation, 
        array $paymentInformation, 
        string $locationId
    )
    {
        $this->phoneNumberDetail->phoneNumber->number = $contactInformation["phone"];

        $this->contact->company->name = $contactInformation["company"];
        $this->contact->emailDetail->emailAddress = $contactInformation["email"];
        $this->contact->personName->firstName = $contactInformation["firstName"];
        $this->contact->personName->lastName = $contactInformation["lastName"];
        $this->contact->phoneNumberDetails[] = $this->phoneNumberDetail;

        // Order contact
        $this->request->orderSubmissionRequest->orderContact->contact = $this->contact;

        $productAssociations = [];
        // Products
        foreach ($documents as $document) {
            $this->request->orderSubmissionRequest->products[] = $document["product"];

            $productAssociation = new ProductAssociation();
            $productAssociation->id = $document['product']['instanceId'];
            $productAssociation->quantity = $document['product']['qty'];

            $productAssociations[] = $productAssociation;
        }

        $this->recipient->contact = $this->contact;
        $this->recipient->pickUpDelivery->location->id = $locationId;

        $this->recipient->productAssociations = $productAssociations;

        // Recipients 
        $this->request->orderSubmissionRequest->recipients[] = $this->recipient;

        $payment = new Payment();
        
        $payment->creditCard->billingAddress->city = "Baltimore";
        $payment->creditCard->billingAddress->countryCode = "US";
        $payment->creditCard->billingAddress->postalCode = "21218";
        $payment->creditCard->billingAddress->stateOrProvinceCode = "MD";
        $payment->creditCard->billingAddress->streetLines[] = "3614 Delverne Rd";

        $payment->creditCard->cardHolderName = "Test card";
        $payment->creditCard->encryptedCreditCard = $paymentInformation["encryptedData"];
        $payment->creditCard->expirationMonth = $paymentInformation["month"];
        $payment->creditCard->expirationYear = $paymentInformation["year"];
        $payment->creditCard->type = $paymentInformation["type"];

        // Payments 
        $this->request->orderSubmissionRequest->payments[] = $payment;

        $request = $this->removeEmptyElements($this->objectToArray($this->request));
        
        return $request;
    }   
}