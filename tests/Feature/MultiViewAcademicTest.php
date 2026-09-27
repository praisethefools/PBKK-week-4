<?php

namespace Tests\Feature;

use Tests\TestCase;

class MultiViewAcademicTest extends TestCase
{
    /**
     * Halaman 1: Beranda dapat diakses dan mewarisi master layout.
     */
    public function test_beranda_page_is_accessible(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('PBKK ITS');
        $response->assertSee('Portal Akademik');
        $response->assertSee('Departemen Teknik Informatika');
    }

    /**
     * Tantangan 2: Parameter ?user=Andi merender komponen salam interaktif.
     */
    public function test_challenge_2_greeting_with_user_parameter(): void
    {
        $response = $this->get('/beranda?user=Andi');

        $response->assertStatus(200);
        $response->assertSee('Andi');
        $response->assertSee('Selamat datang kembali di Portal Akademik');
    }

    /**
     * Halaman 2: Profil Mahasiswa menampilkan data Abdurrahman Arrafi Ravsan Zarnadi.
     */
    public function test_profil_mahasiswa_page_is_accessible(): void
    {
        $response = $this->get('/profil-mahasiswa');

        $response->assertStatus(200);
        $response->assertSee('Abdurrahman Arrafi Ravsan Zarnadi');
        $response->assertSee('5025241241');
        $response->assertSee('Pemrograman Berbasis Kerangka Kerja');
    }

    /**
     * Halaman 3: Ide-Riset Agentic AI menampilkan visualisasi dan form.
     */
    public function test_ide_agent_page_is_accessible(): void
    {
        $response = $this->get('/ide-agent');

        $response->assertStatus(200);
        $response->assertSee('Ide-Riset Agentic AI');
        $response->assertSee('Tailored CV');
        $response->assertSee('Human-in-the-Loop');
    }

    /**
     * Tantangan 1: Toggle tema gelap (/ide-agent?mode=dark).
     */
    public function test_challenge_1_dark_mode_parameter(): void
    {
        $response = $this->get('/ide-agent?mode=dark');

        $response->assertStatus(200);
        $response->assertSee('bg-slate-900');
        $response->assertSee('Mode Gelap Aktif');
    }

    /**
     * Formulir: Pengiriman ide baru divalidasi dan menghasilkan flash message status-banner.
     */
    public function test_submit_idea_form_redirects_with_success_message(): void
    {
        $response = $this->post('/ide-agent', [
            'judul' => 'Pengingat Otomatis Status Interview',
            'kategori' => 'Integrasi Email / API',
            'urgensi' => 'Sedang',
            'deskripsi' => 'Modul untuk membaca balasan email dari HRD dan memperbarui status pelacakan lamaran.',
            'mode' => 'dark',
        ]);

        $response->assertRedirect('/ide-agent?mode=dark');
        $response->assertSessionHas('pesan_sukses');

        $followUp = $this->get('/ide-agent?mode=dark');
        $followUp->assertSee('Pengingat Otomatis Status Interview');
    }
}
