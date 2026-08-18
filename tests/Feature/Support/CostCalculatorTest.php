<?php

namespace Tests\Feature\Support;

use Tests\TestCase;

class CostCalculatorTest extends TestCase
{
    public function test_페이지가_열린다(): void
    {
        $response = $this->get(route('support.cost-calculator'));

        $response->assertOk();
        $response->assertSee('직접 계산해보세요', false);
    }

    public function test_모든_섹션이_렌더링된다(): void
    {
        $response = $this->get(route('support.cost-calculator'));

        // 아트보드 순서대로 섹션 대표 문구를 확인한다 (Figma 163:5589)
        foreach ([
            '복잡한 계산 없이 1분이면 충분합니다',   // 히어로
            '조건을 고르면 바로 계산돼요',          // 계산기
            '계산기에 포함되지 않는 비용',          // 비급여
            '비용 계산기 자주 묻는 질문',           // FAQ
            '계산 결과, 더 정확히 알고 싶으세요?',   // 최종 CTA
            '청담원 재가복지센터',                 // 푸터
        ] as $needle) {
            $response->assertSee($needle, false);
        }
    }

    /**
     * 계산 기능은 없지만 버튼은 눌려야 한다.
     * 등급 5 + 부담구분 4 + 탭 2 + 스테퍼 4 + 시간칩 4 = 19개가 button 이어야 한다.
     */
    public function test_입력_요소가_실제_버튼이고_상태가_바뀐다(): void
    {
        $html = $this->get(route('support.cost-calculator'))->getContent();

        $start = (int) strpos($html, '조건을 고르면 바로 계산돼요');
        $end = (int) strpos($html, '계산기에 포함되지 않는 비용');
        $panel = substr($html, $start, $end - $start);

        $this->assertSame(19, substr_count($panel, 'x-on:click'), '패널의 클릭 가능한 버튼 수가 다르다');
        $this->assertStringContainsString('x-bind:aria-pressed', $panel);

        // 선택에 따라 바뀌는 표시들
        foreach (['x-text="grade"', 'x-text="rate()"', 'care.days', 'nursing.days'] as $binding) {
            $this->assertStringContainsString($binding, $panel);
        }
    }

    public function test_금액이_다시_계산되지_않는다는_안내가_있다(): void
    {
        $this->get(route('support.cost-calculator'))
            ->assertSee('선택에 따라 다시 계산되지 않아요', false);
    }

    public function test_gn_b_비용지원에서_연결된다(): void
    {
        $this->get(route('main'))
            ->assertSee(route('support.cost-calculator'), false);
    }

    public function test_히어로_이미지가_프레임_비율과_맞는다(): void
    {
        $file = public_path('images/support/calculator/hero-calculator.jpg');
        $this->assertFileExists($file);

        [$w, $h] = getimagesize($file);
        $this->assertEqualsWithDelta(1920 / 570, $w / $h, 0.02, "히어로 비율이 다르다 ({$w}x{$h})");
    }
}
