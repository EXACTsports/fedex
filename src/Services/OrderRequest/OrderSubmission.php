<?php

namespace EXACTSports\FedEx\Services\OrderRequest;

use EXACTSports\FedEx\Base\Contact;
use EXACTSports\FedEx\Base\PhoneNumberDetail;
use EXACTSports\FedEx\Base\Recipient;
use EXACTSports\FedEx\DeliveryOptions\ProductAssociation;
use EXACTSports\FedEx\FedExTrait;
use EXACTSports\FedEx\OrderSubmissions\Payment;
use EXACTSports\FedEx\OrderSubmissions\Request;

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
     * Gets order submission request.
     */
    public function getRequest(array $documents,
        array $contactInformation,
        array $billingInformation,
        array $paymentInformation,
        string $locationId
    ) {
        $this->contact->company->name = $contactInformation['company'];
        $this->contact->emailDetail->emailAddress = $contactInformation['email'];
        $this->contact->personName->firstName = $contactInformation['firstName'];
        $this->contact->personName->lastName = $contactInformation['lastName'];

        if (isset($contactInformation['phoneNumber'])) {
            foreach ($contactInformation['phoneNumber'] as $phoneNumber) {
                $phoneNumberDetail = new PhoneNumberDetail();
                $phoneNumberDetail->phoneNumber->number = $phoneNumber['number'];
                $phoneNumberDetail->phoneNumber->extension = $phoneNumber['extension'];

                if (isset($phoneNumber['usage'])) {
                    $phoneNumberDetail->usage = $phoneNumber['usage'];
                }

                $this->contact->phoneNumberDetails[] = $phoneNumberDetail;
            }
        }

        // Order contact
        $this->request->orderSubmissionRequest->orderContact->contact = $this->contact;

        $productAssociations = [];
        // Products
        foreach ($documents as $document) {
            $this->request->orderSubmissionRequest->products[] = $document['product'];

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

        $payment->creditCard->billingAddress->city = $billingInformation['city'];
        $payment->creditCard->billingAddress->countryCode = $billingInformation['countryCode'];
        $payment->creditCard->billingAddress->postalCode = $billingInformation['postalCode'];
        $payment->creditCard->billingAddress->stateOrProvinceCode = $billingInformation['stateOrProvinceCode'];
        $payment->creditCard->billingAddress->streetLines[] = $billingInformation['streetLines'];

        $payment->creditCard->cardHolderName = $paymentInformation['cardHolderName'];
        $payment->creditCard->encryptedCreditCard = $paymentInformation['encryptedData'];
        $payment->creditCard->expirationMonth = $paymentInformation['month'];
        $payment->creditCard->expirationYear = $paymentInformation['year'];
        $payment->creditCard->type = $paymentInformation['type'];

        // Payments
        $this->request->orderSubmissionRequest->payments[] = $payment;

        $request = $this->removeEmptyElements($this->objectToArray($this->request));

        return $request;
    }
}
