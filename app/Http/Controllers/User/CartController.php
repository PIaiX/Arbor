<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends BaseController
{
  // For pages
  public function cart()
  {
    $cart = $this->get_products_from_cart();

		return view('User.cart', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $cart
		]);
	}

  public function add_to_cart(Request $request, $product)
  {
    $services = json_decode($request->input('services_sides', "[]"));
    $count = $request->input('count', 1);
    $this->store_cart($product, $count, $services);

    return redirect()->back();
  }

  public function remove_from_cart(Request $request, $product)
  {
    $count = $request->input('count', 1);
    $this->clean_cart($product, $count);
    
    return redirect()->back();
  }

  public function delete_from_cart($product)
  {
    $cart = $this->clear_cart($product);
    return redirect()->back();
  }

  public function add_service(Request $request, $service)
  {
    $cart = $this->get_cart();
    $product = $request->input('product', null);
    if (empty($product))
      return redirect()->back();

    foreach ($cart[$product]['services'] as $item) {
      if ($item->id == $service) {
        ++$item->count;
      }
    }

    session(['cart' => $cart]);
    return redirect()->back();
  }

  public function remove_service(Request $request, $service)
  {
    $cart = $this->get_cart();
    $product = $request->input('product', null);
    if (empty($product))
      return redirect()->back();

    foreach ($cart[$product]['services'] as $item) {
      if ($item->id == $service && $item->count > 1) {
        --$item->count;
      }
    }

    session(['cart' => $cart]);
    return redirect()->back();
  }

  public function delete_service(Request $request, $service)
  {
    $cart = $this->get_cart();
    $product = $request->input('product', null);
    if (empty($product))
      return redirect()->back();

    foreach ($cart[$product]['services'] as $key => $item) {
      if ($item->id == $service) {
        unset($cart[$product]['services'][$key]);
      }
    }

    session(['cart' => $cart]);
    return redirect()->back();
  }
  // For pages

  // Logic
  protected function get_cart()
  {
    $cart = session('cart', []);

    session(['cart' => $cart]);
    return $cart;
  }

  protected function store_cart($product, $count, $services)
  {
    $cart = $this->get_cart();

    $candidate_index = $this->getKeyFromCart($cart, $product);
    if ($candidate_index !== null) {
      $cart[$candidate_index]['count'] += $count;
      
      foreach ($services as $item) {
        $cart[$candidate_index]['services'][] = $item;
      }
    } else {
      $cart[] = [
        'id' => $product,
        'count' => $count,
        'services' => $services
      ];
    }

    session(['cart' => $cart]);
    return $cart;
  }

  protected function clean_cart($product, $count)
  {
    $cart = $this->get_cart();

    $candidate_index = $this->getKeyFromCart($cart, $product);
    if ($candidate_index !== null) {
      if ((int) $cart[$candidate_index]['count'] > 1) {
        $cart[$candidate_index]['count'] -= $count;
      } else {
        $this->clear_cart($product);
      }
    }

    session(['cart' => $cart]);
    return $cart;
  }

  protected function clear_cart($product)
  {
    $cart = $this->get_cart();

    if (empty($cart)) {
      return null;
    }

    $candidate_index = $this->getKeyFromCart($cart, $product);
    unset($cart[$candidate_index]);

    session(['cart' => $cart]);
    return $cart;
  }

  protected function get_products_from_cart()
  {
    $session_cart = $this->get_cart();

    $total_price = 0;
    $total_count = 0;
    $cart = [
      'products' => []
    ];
    foreach ($session_cart as $item) {
      $product = Product::find($item['id']);
      $product->cart_count = $item['count'];
      $product->services = $item['services'];
      $cart['products'][] = $product;
      $total_price += $product->price * $item['count'];
      $total_count += $item['count'];
    }
    $cart['total_price'] = $total_price;
    $cart['total_count'] = $total_count;

    return $cart;
  }

  protected function getKeyFromCart($cart, $product)
  {
    $key = null;
    foreach($cart as $item_key => $item) {
      if ($product == $item['id']) {
        $key = $item_key;
        break;
      }
    }

    return $key;
  }
  // Logic
}