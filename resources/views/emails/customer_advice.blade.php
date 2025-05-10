<table width="100%" cellpadding="0" cellspacing="0" style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px;">
    <tr>
        <td>
            <table width="600" align="center" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border: 1px solid #ddd; border-radius: 8px; padding: 30px;">
                <tr>
                    <td style="text-align: center; padding-bottom: 20px;">
                        <h2 style="margin: 0; color: #333333;">Yêu cầu tư vấn mới</h2>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 15px; color: #555555; line-height: 1.6;">
                        <p><strong>Họ tên:</strong> {{ $data['name'] }}</p>
                        <p><strong>Số điện thoại:</strong> {{ $data['phone'] }}</p>
                        <p><strong>Ghi chú:</strong> {{ $data['note'] ?? 'Không có' }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 20px; text-align: center;">
                        <p style="font-size: 13px; color: #999999;">Email này được gửi tự động từ hệ thống</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
