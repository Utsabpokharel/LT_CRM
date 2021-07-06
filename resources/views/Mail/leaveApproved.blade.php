@component('mail::message')
# Leave Approved

The body of your message.
<h2>Hello ,<h2>
<p>Your Leave application has been <b>Approved</b> .</p>
<i><br>
    Hope to see you soon !!!
</i>

@component('mail::button', ['url' => ''])
Click here...
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
