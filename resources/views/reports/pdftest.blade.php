<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/reports.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
<footer>
    <div class="information footer-bottom">
    <table width="100%">
        <tr>
            <td align="left" style="width: 25%;">
                 {{ date("F j, Y, g:i a") }}
            </td>
            <td align="left" class="cell-title-5 cell-text-center">
                &copy; {{ date('Y') }} .
            </td>
            <td align="right" class="cell-title-small">
            </td>
        </tr>
    </table>
</div>
</footer>

<div class="information">
    <table width="100%">
    <tr>
        <td align="left" class="cell-title-medium">
          
                <img src="test" width="100" height="100" class="logo" alt="logo"/>
          
        </td>
        <td align="center" class="cell-title-large cell-text-center">
            <h3>ALEX LIMITED</h3>
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
    <h2>Data View</h2>
</div>

<br/>

<div class="content">
    @yield('main-content')
</div>
<script type="text/php">
if ( isset($pdf) ) {
    $pdf->page_script('
        if ($PAGE_COUNT > 1) {
            $font = $fontMetrics->get_font("Verdana, Arial, sans-serif", "normal");
            $size = 10;
            $pageText = "Page " . $PAGE_NUM . " of " . $PAGE_COUNT;
            $y = 820;
            $x = 520;
            $pdf->text($x, $y, $pageText, $font, $size);
        }
    ');
}
</script></body></html>