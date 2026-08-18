<?php

namespace Tests\Feature\Support;

use Tests\TestCase;

class LongTermCareGradeTest extends TestCase
{
    public function test_페이지가_열린다(): void
    {
        $response = $this->get(route('support.long-term-care-grade'));

        $response->assertOk();
        $response->assertSee('쉽게 알려드릴게요', false);
    }

    public function test_모든_섹션이_렌더링된다(): void
    {
        $response = $this->get(route('support.long-term-care-grade'));

        // 아트보드 순서대로 섹션 대표 문구를 확인한다 (Figma 153:3866)
        foreach ([
            '장기요양등급,',                      // 히어로
            '꼭 알아야 할 핵심 4가지',             // Key facts
            '장기요양등급, 이렇게 나뉘어요',        // Grades
            '신청부터 등급 판정까지, 4단계',        // Steps
            '실제 부담은 일부예요',                // 본인부담
            '전담 매니저가 무료로 도와드려요',      // Help
            '장기요양등급 자주 묻는 질문',          // FAQ
            '등급 신청, 어디서부터 막막하셨나요?',   // 최종 CTA
            '청담원 재가복지센터',                 // 푸터
        ] as $needle) {
            $response->assertSee($needle, false);
        }
    }

    public function test_등급_6종과_부담률_4종이_들어간다(): void
    {
        $response = $this->get(route('support.long-term-care-grade'));

        foreach (['1등급', '2등급', '3등급', '4등급', '5등급', '인지지원등급'] as $grade) {
            $response->assertSee($grade, false);
        }

        foreach (['재가급여', '시설급여', '경감 대상', '기초수급'] as $kind) {
            $response->assertSee($kind, false);
        }
    }

    public function test_gn_b_비용지원에서_연결된다(): void
    {
        // 어느 페이지에서든 헤더 드롭다운으로 진입할 수 있어야 한다
        $this->get(route('main'))
            ->assertSee(route('support.long-term-care-grade'), false);
    }

    public function test_공단_규정_문구에_주의_안내가_붙어_있다(): void
    {
        $response = $this->get(route('support.long-term-care-grade'));

        // 인정점수·본인부담률은 고시 대조 전이므로 화면에 단서가 남아 있어야 한다
        $response->assertSee('공단 정책에 따라 달라질 수 있어요', false);
        $response->assertSee('급여 종류·대상자 구분에 따라 달라집니다', false);
    }
}
