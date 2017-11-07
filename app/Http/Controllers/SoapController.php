<?php

namespace App\Http\Controllers;

use App\Soap\Request\GetConversionAmount;
use App\Soap\Response\GetConversionAmountResponse;
use Artisaninweb\SoapWrapper\SoapWrapper;
use Illuminate\Http\Request;


class SoapController extends Controller
{
    /**
     * @var SoapWrapper
     */
    protected $soapWrapper;

    /**
     * SoapController constructor.
     *
     * @param SoapWrapper $soapWrapper
     */
    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }

    /**
     * Use the SoapWrapper
     */
    public function show(Request $request)
    {
        $this->soapWrapper->add('Currency', function ($service) {
            $service
                ->wsdl('http://currencyconverter.kowabunga.net/converter.asmx?WSDL')
                ->trace(true)
                ->classmap([
                    GetConversionAmount::class,
                    GetConversionAmountResponse::class,
                ]);
        });

        // With classmap
        $response = $this->soapWrapper->call('Currency.GetConversionAmount',
            [
            new GetConversionAmount(
                'USD',
                'EUR',
                '2017-08-05',
                "$request->usd"
            )
        ]);

        dd($response);
    }
}
