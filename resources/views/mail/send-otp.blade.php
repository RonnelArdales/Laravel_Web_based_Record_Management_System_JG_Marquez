<x-mail::message>
# Change Password

This an email verification code to change your password

# {{$otp}}
{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>