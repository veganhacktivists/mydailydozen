@section('header', 'Get in touch with us!')
<x-master>
    <x-contact-form :email="auth()->user()->email" />
</x-master>
