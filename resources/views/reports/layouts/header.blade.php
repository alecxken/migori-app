<table width="100%">
    <tr>
        <td align="left" class="cell-title-medium">
          
                <img src="test" width="100" height="100" class="logo" alt="logo"/>
          
        </td>
        <td align="center" class="cell-title-large cell-text-center">
            <h3>{{ Illuminate\Support\Str::limit('test', 30)}}</h3>
            <p>
                @isset($setting->postal_address)
                    {{ Illuminate\Support\Str::limit('test', 25)}}
                @endisset
                @isset($setting->physical_address)
                    {{ Illuminate\Support\Str::limit('test', 25)}}
                @endisset
            </p>
            <p>
                @isset($setting->phone)
                    Phone:  {{ Illuminate\Support\Str::limit('test', 13)}}
                @endisset
                @isset($setting->email)
                        Email:  {{ Illuminate\Support\Str::limit('test', 25)}}
                @endisset
            </p>
        </td>
        <td class="cell-title-medium cell-text-center"></td>
    </tr>
</table>
<hr/>