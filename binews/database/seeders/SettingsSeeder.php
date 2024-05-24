<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Kabupaten;
use App\Models\Kota;
use App\Models\Settings;
use App\Models\StatisPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Settings::insert(array(
            array(
                'name' => "company_logo",
                'value' => '/images/logo.png',
                'created_by' => 1,
            ),
            array(
                'name' => "company_logo_dark",
                'value' => '/images/logo-dark.png',
                'created_by' => 1,
            ),
            array(
                'name' => "company_favicon",
                'value' => '/images/favicon.ico',
                'created_by' => 1,
            ),
            array(
                'name' => "company_sidebar_logo",
                'value' => '/images/logo.png',
                'created_by' => 1,
            ),
            array(
                'name' => "company_sidebar_logo_dark",
                'value' =>  '/images/logo-dark.png',
                'created_by' => 1,
            ),
            array(
                'name' => "title_text",
                'value' => 'BiNews',
                'created_by' => 1,
            ),
            array(
                'name' => "subtitle_text",
                'value' => 'Portal Berita Kesayangan Kamu',
                'created_by' => 1,
            ),
            array(
                'name' => "site_currency",
                'value' => 'IDR',
                'created_by' => 1,
            ),
            array(
                'name' => "site_currency_symbol",
                'value' => 'Rp',
                'created_by' => 1,
            ),
            array(
                'name' => "site_currency_symbol_position",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "site_date_format",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "site_time_format",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "invoice_prefix",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "proposal_prefix",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "bill_prefix",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "customer_prefix",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "vendor_prefix",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "journal_prefix",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "footer_title_notes",
                'value' => '',
                'created_by' => 1,
            ),
            array(
                'name' => "footer_title_notes_2",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "decimal_number",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "shipping_display",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "company_name",
                'value' => 'BiNews',
                'created_by' => 1,
            ),
            array(
                'name' => "company_address",
                'value' => 'Komp. Kodam 65 Siteba - Padang Sumatera Barat',
                'created_by' => 1,
            ),
            array(
                'name' => "company_city",
                'value' => 'Surabaya',
                'created_by' => 1,
            ),
            array(
                'name' => "company_state",
                'value' => 'Jawa Timur',
                'created_by' => 1,
            ),
            array(
                'name' => "company_zipcode",
                'value' => '25146',
                'created_by' => 1,
            ),
            array(
                'name' => "company_country",
                'value' => 'Indonesia',
                'created_by' => 1,
            ),
            array(
                'name' => "company_telephone",
                'value' => '(0751)38834',
                'created_by' => 1,
            ),
            array(
                'name' => "company_email",
                'value' => ' admin@binews.id',
                'created_by' => 1,
            ),
            array(
                'name' => "company_email_from_name",
                'value' => 'notif@binews.id',
                'created_by' => 1,
            ),
            array(
                'name' => "registration_number",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "tax_type",
                'value' => 'enabled',
                'created_by' => 1,
            ),
            array(
                'name' => "tax_fee",
                'value' => 11, // Nilai besaran pajak
                'created_by' => 1,
            ),
            array(
                'name' => "tax_tempo_date",
                'value' => 20, // Tanggal jatuh tempo tagihan
                'created_by' => 1,
            ),
            array(
                'name' => "tax_date_line",
                'value' => 2, // Tagihan dibuat sebelum hari
                'created_by' => 1,
            ),
            array(
                'name' => "isolir",
                'value' => 1, // Default = 0 Tidak Aktif, 1 = Aktif
                'created_by' => 1,
            ),
            array(
                'name' => "vat_number",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "display_landing_page",
                'value' => ' ',
                'created_by' => 1,
            ),
            array(
                'name' => "title_text_option",
                'value' => 'BiNews',
                'created_by' => 1,
            ),
            array(
                'name' => "footer_text_option",
                'value' => 'BiNews',
                'created_by' => 1,
            ),
            array(
                'name' => "default_language",
                'value' => 'id',
                'created_by' => 1,
            ),
            array(
                'name' => "meta_description",
                'value' => 'BiNews - Berpikir Merdeka, Santun dalam Berita',
                'created_by' => 1,
            ),
            array(
                'name' => "meta_keywords",
                'value' => 'news, global, elite, network, isp, anchor, breakingnews,',
                'created_by' => 1,
            ),
            array(
                'name' => "foot_note_remarks",
                'value' => 'https://berdikari.web.id',
                'created_by' => 1,
            ),

        ));

        Category::insert(array(
            array(
                'nama_categories' => "Politik",
                'created_by' => 1,
            ),
            array(
                'nama_categories' => "Hukum",
                'created_by' => 1,
            ),
            array(
                'nama_categories' => "Ekonomi",
                'created_by' => 1,
            ),
            array(
                'nama_categories' => "Olahraga",
                'created_by' => 1,
            ),
            array(
                'nama_categories' => "Gaya Hidup",
                'created_by' => 1,
            ),
            array(
                'nama_categories' => "Hiburan",
                'created_by' => 1,
            ),
            array(
                'nama_categories' => "Kesehatan",
                'created_by' => 1,
            ),
            array(
                'nama_categories' => "Teknologi",
                'created_by' => 1,
            ),
            array(
                'nama_categories' => "Pariwisata",
                'created_by' => 1,
            ),
            array(
                'nama_categories' => "Peristiwa",
                'created_by' => 1,
            ),
        ));

        Kabupaten::insert(array(
            array(
                'nama' => 'Kabupaten Tanah Datar',
                'jenis' => 'Kabupaten',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kabupaten Agam',
                'jenis' => 'Kabupaten',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kabupaten Lima Puluh Kota',
                'jenis' => 'Kabupaten',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kabupaten Padang Pariaman',
                'jenis' => 'Kabupaten',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kabupaten Pasaman Barat',
                'jenis' => 'Kabupaten',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kabupaten Pasaman',
                'jenis' => 'Kabupaten',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kabupaten Pesisir Selatan',
                'jenis' => 'Kabupaten',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kabupaten Solok',
                'jenis' => 'Kabupaten',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kabupaten Wok Selatan',
                'jenis' => 'Kabupaten',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kabupaten Sijunjung',
                'jenis' => 'Kabupaten',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kabupaten Dharmasraya',
                'jenis' => 'Kabupaten',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kabupaten Mentawai',
                'jenis' => 'Kabupaten',
                'is_active' => 1,
            )
        ));

        Kabupaten::insert(array(
            array(
                'nama' => 'Kota Padang',
                'jenis' => 'Kota',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kota Bukit Tinggi',
                'jenis' => 'Kota',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kota Payakumbuh',
                'jenis' => 'Kota',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kota Padang Panjang',
                'jenis' => 'Kota',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kota Pariaman',
                'jenis' => 'Kota',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kota Solok',
                'jenis' => 'Kota',
                'is_active' => 1,
            ),
            array(
                'nama' => 'Kota Sawahlunto',
                'jenis' => 'Kota',
                'is_active' => 1,
            ),
        ));

        StatisPage::insert(array(
            array(
                'name_page' => "tentang",
                'value_content' => '/images/logo.png',
                'created_by' => 1,
            ),
            array(
                'name_page' => "redaksi",
                'value_content' => '/images/logo.png',
                'created_by' => 1,
            ),
            array(
                'name_page' => "ketentuan",
                'value_content' => '/images/logo.png',
                'created_by' => 1,
            ),
            array(
                'name_page' => "pedoman",
                'value_content' => '/images/logo.png',
                'created_by' => 1,
            ),
        ));
    }
}
