{{-- @component('mail::message')
# Congratulations! Your admission has been confirmed.

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}

Hi, {{ $name }} <br>
Your Admission of Al-Emdad Degree College has been confirmed.
<br><br>
Note this information-
<table>
    <tr>
        <td>Student id</td>
        <td>:</td>
        <td>{{ $st_id }}</td>
    </tr>
    <tr>
        <td>Session</td>
        <td>:</td>
        <td>{{ $session }}</td>
    </tr>
    <tr>
        <td>Class</td>
        <td>:</td>
        <td>{{ $c_class }}</td>
    </tr>
    <tr>
        <td>Group</td>
        <td>:</td>
        <td>{{ $department }}</td>
    </tr>
</table>
<br><br>
Thanks,<br>
{{ config('app.name') }}
