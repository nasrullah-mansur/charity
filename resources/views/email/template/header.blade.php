<table align="center" bgcolor="#C8C8C8" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
    <tr>
        <td bgcolor="#C8C8C8">
            <table class="responsive-table" align="center" bgcolor="#C8C8C8" height="45" width="440">
                <tbody>
                <tr>
                    <td bgcolor="#C8C8C8" height="45"></td>
                </tr>
                </tbody>
            </table>
            <!--Main Wrapper - INCLUDE ANY NEW TABLES INSIDE THIS TABLE-->
            <table class="responsive-table" align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0"
                   width="440">
                <tbody>
                <tr>
                    <td bgcolor="#FFFFFF" width="30"></td>
                    <td bgcolor="#FFFFFF">
                        <!--START MAIN TABLE TD-->
                        <table class="responsive-table" align="center" cellpadding="0" cellspacing="0" height="20"
                               width="100%">
                            <tbody>
                            <tr>
                                <td height="20"></td>
                            </tr>
                            </tbody>
                        </table>

                        <table style="font-family:'Muli', Arial; font-size:13px; font-weight:300; color:#A1A1A1"
                               class="responsive-table table-block" align="center" cellpadding="0" cellspacing="0"
                               width="100%">
                            <tbody>
                            <tr>
                                <td>
                                    {{--<a title="" data-placement="top" data-toggle="tooltip" style="text-decoration:none"--}}
                                       {{--href="" data-original-title="Click to add URL">--}}
                                        {{--@if(allsetting('logo'))--}}
                                            {{--<img width="139" src="{{asset(path_settings_image().allsetting('logo'))}}"--}}
                                                 {{--border="0" width="100" alt="" class="img-fluid">--}}
                                        {{--@else--}}
                                            {{--<img src="{{asset('assets/images/logo.png')}}" alt="" class="img-fluid">--}}
                                        {{--@endif </a>--}}
                                </td>
                                <td align="right">
                                    <img src="" alt=""> {{date('d M,Y')}}
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="responsive-table" align="center" cellpadding="0" cellspacing="0" height="20"
                               width="100%">
                            <tbody>
                            <tr>
                                <td height="20"></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td bgcolor="#FFFFFF" width="30"></td>
                </tr>
                </tbody>
            </table>

            <table class="responsive-table" align="center" bgcolor="#2e6ff2" border="0" cellpadding="0" cellspacing="0"
                   width="440">
                <tbody>
                <tr height="30"></tr>
                <!-- <tr bgcolor="#0095da"> -->
                <tr bgcolor="#2e6ff2">

                    <td width="30"></td>
                    <td style="font-family:'Muli', Arial; font-size:24px; color:#FFFFFF; text-align:center; font-weight:300">
                        <table width="380" style="color:#ffffff ">
                            <tr>
                                <td align="center">
                                    @if(allsettings('company_name'))
                                        {{__('Welcome to ').allsettings('company_name')}}
                                    @else
                                        {{__('Welcome to Company Name')}}
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:16px" align="center">
                                    {{__('This is an important message for you')}}
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="30"></td>
                </tr>
                <tr height="30"></tr>
                </tbody>
            </table>

            <table class="responsive-table" align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0"
                   width="440">
                <tbody>
                <tr height="40"></tr>
                <tr bgcolor="#ffffff">
                    <td bgcolor="#FFFFFF">
                        <table style="font-family:'Muli', Arial; font-size:14px; color:#48545d" class="responsive-table"
                               align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="440">
                            <tbody>
                            <tr>
                                <td width="30"></td>
                                <td>
