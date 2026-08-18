<?php

namespace Tests\Feature\Site;

use Tests\TestCase;

class HeroImageTest extends TestCase
{
    /**
     * 히어로 프레임은 1920x570(비율 3.368)이다.
     *
     * 시안에서 내보낸 크롭이 아니라 원본을 그대로 넣으면 object-cover 가
     * 남는 쪽을 잘라내 피사체가 확대돼 보인다. 본인부담금 히어로에서
     * 실제로 발생했던 문제라 비율을 테스트로 고정한다.
     */
    public function test_히어로_이미지가_프레임_비율과_맞는다(): void
    {
        $frameRatio = 1920 / 570;

        $heroes = [
            'images/support/copayment/hero-copayment.jpg',
            'images/services/platform/hero-platform.jpg',
        ];

        foreach ($heroes as $path) {
            $file = public_path($path);
            $this->assertFileExists($file);

            [$w, $h] = getimagesize($file);
            $this->assertEqualsWithDelta(
                $frameRatio,
                $w / $h,
                0.02,
                "$path 비율이 히어로 프레임과 다르다 ({$w}x{$h})"
            );
        }
    }

    /**
     * 장기요양등급 히어로는 시안이 세로로 잘라 쓰는 배치라 비율이 다르다.
     * 대신 크롭 위치를 시안값(위에서 19px = 14.4%)으로 고정한다.
     */
    public function test_장기요양등급_히어로_크롭_위치가_시안과_같다(): void
    {
        $this->get(route('support.long-term-care-grade'))
            ->assertSee('object-position: 50% 14.4%', false);
    }

    public function test_플랫폼_히어로에_시안의_불투명도가_걸려_있다(): void
    {
        $this->get(route('services.platform'))
            ->assertSee('object-cover opacity-80', false);
    }
}
