@component('mail::message')
# New Task Assigned

<h2>Hello Valued Employee,<h2>
<p>You have been assigned a task from our office. </p>
<i>We are pleased to inform you to login your dashboard for more details.<br>
Please contact office for any queries<b></b>
</i>

@component('mail::button', ['url' => 'https://www.crm.gcn.com.np'])
Click here...
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
