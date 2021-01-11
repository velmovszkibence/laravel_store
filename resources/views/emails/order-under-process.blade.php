@component('mail::message')

<h1>Thank You for choosing Us {{ $user }} !</h1>
<h4>Your order is being processed</h4>

@component('mail::panel')
ORDER DETAILS
<hr />
Date: {{ $date }}
<br />
@component('mail::table')
| Id | Name | Price | Quantity | Subtotal |
| -- |:----:| -----:| --------:| --------:|
@foreach($cart->items as $item)
| {{$item['item']['id']}} | {{$item['item']['name']}} | {{$item['item']['price']}} | {{$item['quantity']}}|{{$item['price']}} |
@endforeach
@endcomponent

Total Price: $ {{ $cart->totalPrice }}

@endcomponent

Thanks,<br>
{{ config('mail.from.name') }}
@endcomponent
