<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    function storeNew(Request $request)
    {
        foreach ($request->input() as $key => $value) {
            if ($request->input($key) != null && $key != "_token") {
                $itemsRequest[] = [
                    "item_id" => $key,
                    "quantity_order" => $request->input($key),
                ];
            }
        }


        try {

            $data = [
                "itemsRequest" => $itemsRequest,
                "items" => Item::get(['id', 'name', 'price']),
            ];


            $request->session()->put(0, $itemsRequest);


        } catch (\Exception $e) {
            return view('user.exception');
        }

        return view('user.cart', $data);
    }

    function cart()
    {
        $itemsRequest = Session::pull(0);

        try {
            $toOrder["user_id"] = Auth::id();
            $toPivotTable = $itemsRequest;

            Order::create($toOrder)->items()->sync($toPivotTable);

            for ($i = 0; $i < count($itemsRequest); $i++) {
                $item = Item::where('id', $itemsRequest[$i]['item_id']);
                $item->update(array('quantity' => $items = Item::where('id', $itemsRequest[$i]['item_id'])
                        ->value('quantity') - $itemsRequest[$i]['quantity_order']));

            }
        } catch (\Exception $e) {
            return "you didn't choose any item";
        }

        return redirect('/user');

    }
}
