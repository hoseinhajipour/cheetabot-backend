<?php

namespace Modules\Portfolio\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class PortfolioController extends Controller
{
    public function getAccountInfo()
    {
        $rs = Http::withHeaders(["authorization" => "BasicAuthentication 00860901-46a8-468f-ac2e-65288990d52e"])
            ->get("https://api2.mofidonline.com/web/v1/Accounting/Remain");
        return $rs;
    }

    public function getPortfolio()
    {
        $rs = Http::withHeaders(["authorization" => "BasicAuthentication 00860901-46a8-468f-ac2e-65288990d52e"])
            ->get("https://api2.mofidonline.com/web/v1/DailyPortfolio/LightDailyPortfolioMobile");
        return $rs;
    }

    public function SearchSymbol(Request $request)
    {
        $rs = Http::get("https://api2.mofidonline.com/web/v1/Symbol/GetSymbol?term=" . $request->term);
        return $rs;
    }

    public function SymbolInfo(Request $request)
    {
        $rs = Http::get("https://core.tadbirrlc.com//StockFilteredResult?Type=getLightSymbolInfoAndQueue&nscCode=" . $request->code);
        return $rs;
    }

    public function getOrderHistory()
    {
        $body = [
            "NSCCode" => null,
            "OrderFrom" => null,
            "AccountingType" => null,
            "OrderSide" => null,
            "OrderState" => null,
            "FromDate" => "2021-05-30T06:48:52.309Z",
            "ToDate" => null,
            "PageIndex" => 0,
            "PageSize" => 20,
        ];
        $rs = Http::withHeaders(["authorization" => "BasicAuthentication 00860901-46a8-468f-ac2e-65288990d52e"])
            ->post("https://api2.mofidonline.com/web/v1/Order/GetOrderList/Customer/GetOrderList", $body);
        return $rs;
    }

    public function buyOrder(Request $request)
    {
        $body = [
            "FinancialProviderId" => 1,
            "isin" => $request->symbol,
            "maxShow" => 0,
            "orderCount" => intval($request->count),
            "orderId" => 0,
            "orderPrice" => intval($request->price),
            "orderSide" => 65,
            "orderValidity" => 74,
            "orderValiditydate" => "",
        ];
        $rs = Http::withHeaders(["authorization" => "BasicAuthentication 00860901-46a8-468f-ac2e-65288990d52e"])
            ->post("https://api2.mofidonline.com/web/v1/Order/Post", $body);
        return $rs;
    }

    public function sellOrder(Request $request)
    {
        $body = [
            "orderCount" => intval($request->count),
            "orderPrice" => intval($request->price),
            "FinancialProviderId" => 1,
            "isin" => $request->symbol,
            "orderSide" => 86,
            "orderValidity" => 74,
            "orderValiditydate" => "",
            "maxShow" => 0,
            "orderId" => 0,

        ];
        $rs = Http::withHeaders(["authorization" => "BasicAuthentication 00860901-46a8-468f-ac2e-65288990d52e"])
            ->post("https://api2.mofidonline.com/web/v1/Order/Post", $body);
        return $rs;
    }
}
