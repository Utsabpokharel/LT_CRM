@component('mail::message')
# Leave Rejected

<h2>Hello,<h2>
<p>Your Leave Application Is <b>Rejected</b>.</p>
<i>
Please Contact Office for further queries !!!
</i>

@component('mail::button', ['url' => 'https://www.crm.gcn.com.np'])
Click here...
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
