<?php

namespace Tests\Feature;

use Tests\TestCase;

class CareersTest extends TestCase
{
    public function test_페이지가_열린다(): void
    {
        $response = $this->get(route('careers'));

        $response->assertOk();
        $response->assertSee('동료를 찾습니다', false);
    }

    public function test_히어로와_공고_섹션이_렌더링된다(): void
    {
        $response = $this->get(route('careers'));

        foreach ([
            '함께 성장할',                   // 히어로 H1
            '심리 상담까지. 청담원이 함께합니다', // 히어로 서브
            '1분 간편 지원하기',              // 히어로 CTA
            '청담원에서 일한다는 것',          // 히어로 하단 링크
            '지금 모집 중인 포지션',           // 공고 섹션
            '기장군 방문간호 간호사 모집',      // 공고
            '부산 기장군',
            '주 1회 · 회당 1시간',
            '방문당 40,000원',
            '청담원 재가복지센터',            // 푸터
        ] as $needle) {
            $response->assertSee($needle, false);
        }
    }

    /**
     * 필터·검색은 실제로 동작해야 한다. 셀렉트 3개 + 검색 input 이 있고
     * 조건에 맞는 공고가 없을 때 빈 상태를 보여준다.
     */
    public function test_필터와_검색이_동작할_수_있게_붙어_있다(): void
    {
        $html = $this->get(route('careers'))->getContent();

        $this->assertSame(3, substr_count($html, '<select'), '셀렉트가 3개여야 한다');
        $this->assertStringContainsString('type="search"', $html);
        $this->assertStringContainsString('x-model="query"', $html);
        $this->assertStringContainsString('x-show="match(jobs[0])"', $html);
        $this->assertStringContainsString('조건에 맞는 공고가 없어요', $html);

        // 셀렉트 항목은 공고에서 뽑는다
        $this->assertStringContainsString('전체 직군 (1)', $html);
    }

    public function test_gn_b_상단_메뉴에서_연결된다(): void
    {
        $this->get(route('main'))->assertSee(route('careers'), false);
    }

    public function test_히어로_이미지가_프레임_비율과_맞는다(): void
    {
        $file = public_path('images/careers/hero-careers.jpg');
        $this->assertFileExists($file);

        [$w, $h] = getimagesize($file);
        $this->assertEqualsWithDelta(1920 / 570, $w / $h, 0.02, "히어로 비율이 다르다 ({$w}x{$h})");
    }
}
