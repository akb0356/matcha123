<?php

namespace Tests\Feature\Support;

use Tests\TestCase;

class CopaymentTest extends TestCase
{
    public function test_페이지가_열린다(): void
    {
        $response = $this->get(route('support.copayment'));

        $response->assertOk();
        $response->assertSee('부담은 생각보다 크지 않아요', false);
    }

    public function test_모든_섹션이_렌더링된다(): void
    {
        $response = $this->get(route('support.copayment'));

        // 아트보드 순서대로 섹션 대표 문구를 확인한다 (Figma 156:4390)
        foreach ([
            '실제 본인부담금이 얼마인지 쉽게 정리했어요',  // 히어로
            '본인부담금이 뭔가요?',                      // 흐름
            '어떤 서비스냐에 따라 달라져요',              // 급여 종류
            '소득이 적으면 더 줄어들어요',                // 경감
            '등급마다 월 이용 한도가 있어요',             // 한도
            '이렇게 계산돼요',                          // 계산 예시
            '본인부담금 자주 묻는 질문',                  // FAQ
            '내 부담금이 얼마인지 궁금하신가요?',          // 최종 CTA
            '청담원 재가복지센터',                       // 푸터
        ] as $needle) {
            $response->assertSee($needle, false);
        }
    }

    public function test_등급별_한도_6종이_들어간다(): void
    {
        $response = $this->get(route('support.copayment'));

        foreach ([
            '2,069,900원', '1,869,600원', '1,455,800원',
            '1,341,800원', '1,151,600원', '643,000원',
        ] as $limit) {
            $response->assertSee($limit, false);
        }
    }

    public function test_경감_구간_4종이_들어간다(): void
    {
        $response = $this->get(route('support.copayment'));

        foreach (['일반 대상자', '40% 경감', '60% 경감', '기초수급자'] as $tier) {
            $response->assertSee($tier, false);
        }
    }

    public function test_gn_b_비용지원에서_연결된다(): void
    {
        $this->get(route('main'))
            ->assertSee(route('support.copayment'), false);
    }

    public function test_공단_규정_주의_안내가_붙어_있다(): void
    {
        $response = $this->get(route('support.copayment'));

        $response->assertSee('공단 기준에 따라 달라질 수 있어요', false);
        $response->assertSee('공단 고시 기준으로 매년 변동돼요', false);
    }

    public function test_최종_ct_a가_72_20_16_이다(): void
    {
        $response = $this->get(route('support.copayment'));

        $response->assertSee('text-eb44 text-surface lg:text-eb72', false);
        $response->assertSee('text-b20 text-surface', false);
        $response->assertSee('text-b16 text-surface', false);
    }
}
