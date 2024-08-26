@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Forge')
<img src="https://drive.google.com/uc?export=view&id=1S9YaIMoBaVN6l1KMsMf-0sw2tNWQmodn" alt="" srcset="">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
