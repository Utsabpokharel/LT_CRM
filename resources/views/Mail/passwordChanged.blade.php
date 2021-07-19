@component('mail::message')
# Password Changed

Your login password for GCN-CRM is changed. <i>Please inform office if it was not you.</i>

@component('mail::button', ['url' => 'https://www.crm.gcn.com.np'])
Click here...
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
