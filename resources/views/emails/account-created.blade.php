@component('mail::message')

<h1>Welcome!</h1>
<h4>Thank you for creating an account on our site. We're so glad you joined us.<br />
    Just follow this link below to confirm your email address and you will be able to continue shopping.
</h4>

@component('mail::button', ['url' => ''])
Confirm your Email!
@endcomponent

Best Regards,<br>
The asdfgh team
@endcomponent
