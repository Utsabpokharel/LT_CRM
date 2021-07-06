@component('mail::message')
# Introduction

Your acoount has been created for Our CRM. Please contact office for login credentials and follow this link.

@component('mail::button', ['url' => 'https://www.crm.gcn.com.np'])
Click here...
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
