@component('mail::message')
# Leave Apply
<h2>Hello,</h2>
<p>I have applied an application for leave from our system. I would be grateful if gets approved.</p>
<i><br>
    Please kindly review and check my application for further actions.
</i>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{Auth::user()->username}}
@endcomponent
