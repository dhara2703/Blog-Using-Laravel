@component('mail::message')
# Introduction

Thank you so much for registering!

@component('mail::button', ['url' => 'http://laracasts.com'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Be the change that you wish to see in the world.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
