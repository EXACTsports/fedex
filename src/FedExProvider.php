<?php

namespace EXACTSports\FedEx;

use Illuminate\Support\ServiceProvider;
use EXACTSports\FedEx\Http\Livewire\Content;
use EXACTSports\FedEx\Http\Livewire\UploadFile;
use EXACTSports\FedEx\Http\Livewire\PrintOptions\SetPrintOptions;
use EXACTSports\FedEx\Http\Livewire\PrintOptions\PrintOption;
use EXACTSports\FedEx\Http\Livewire\PrintOptions\PrintOptionPanel;
use EXACTSports\FedEx\Http\Livewire\PrintOptions\MenuWithOptions;
use EXACTSports\FedEx\Http\Livewire\Cart;
use EXACTSports\FedEx\Http\Livewire\DeliveryOptions;
use EXACTSports\FedEx\Http\Livewire\Checkout;
use EXACTSports\FedEx\Http\Livewire\SelectLocation;
use EXACTSports\FedEx\Http\Livewire\ContactInformation;
use EXACTSports\FedEx\Http\Livewire\PaymentInformation;
use EXACTSports\FedEx\Http\Livewire\ReviewOrder;
use EXACTSports\FedEx\Http\Livewire\Pickup;
use EXACTSports\FedEx\Http\Livewire\Locations;
use Livewire\Livewire;

class FedExProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'fedex');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->publishes([
        __DIR__.'/../public' => public_path('vendor/fedex'),
        ], 'public');
        Livewire::component('fedex::content', Content::class);
        Livewire::component('fedex::upload-file', UploadFile::class);
        Livewire::component('fedex::set-print-options', SetPrintOptions::class);
        Livewire::component('fedex::print-option', PrintOption::class);
        Livewire::component('fedex::print-option-panel', PrintOptionPanel::class);
        Livewire::component('fedex::menu-with-options', MenuWithOptions::class);
        Livewire::component('fedex::cart', Cart::class);
        Livewire::component('fedex::delivery-options', DeliveryOptions::class);
        Livewire::component('fedex::checkout', Checkout::class);
        Livewire::component('fedex::select-location', SelectLocation::class);
        Livewire::component('fedex::contact-information', ContactInformation::class);
        Livewire::component('fedex::payment-information', PaymentInformation::class);
        Livewire::component('fedex::review-order', ReviewOrder::class);
        Livewire::component('fedex::pickup', Pickup::class);
        Livewire::component('fedex::locations', Locations::class);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/fedex.php', 'fedex');
    }
}
