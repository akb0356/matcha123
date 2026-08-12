<?php

namespace Tests\Feature\Services;

use Tests\TestCase;

class VisitingCareTest extends TestCase
{
    public function test_방문요양_소개_페이지가_열린다(): void
    {
        $response = $this->get(route('services.visiting-care'));

        $response->assertOk();
        $response->assertSee('익숙한 집에서', false);
    }

    public function test_모든_섹션이_렌더링된다(): void
    {
        $response = $this->get(route('services.visiting-care'));

        // 아트보드 순서대로 섹션 대표 문구를 확인한다 (Figma 153:1976)
        foreach ([
            '방문요양 · 식사·이동·일상생활 지원',   // 히어로 eyebrow
            '집에서 돌보는 일',                    // S1 고민
            '요양보호사가 찾아갑니다',              // 요양보호사 소개
            '그 외',                              // 검증 인원 캡션
            '무엇을 했는지 다 보여드려요',           // 방문 기록
            '오늘의 돌봄',                         // 방문 기록 지표
            '보호자들이 전하는 변화',               // 후기
            '생각보다 부담은 크지 않아요',           // 비용
            '방문요양 자주 묻는 질문',              // FAQ
            '어떤 돌봄이 맞을까요?',                // 서비스 비교
            '집에서 받는 일상 돌봄',                // 최종 CTA
            '청담원 재가복지센터',                  // 푸터
        ] as $needle) {
            $response->assertSee($needle, false);
        }
    }

    public function test_방문간호_페이지와_서로_연결된다(): void
    {
        $this->get(route('services.visiting-care'))
            ->assertSee(route('services.visiting-nursing'), false);

        $this->get(route('services.visiting-nursing'))
            ->assertSee(route('services.visiting-care'), false);
    }

    public function test_방문간호_전용_섹션은_없다(): void
    {
        // 「지시서·케어 플랜」은 방문간호에만 있는 섹션이다
        $this->get(route('services.visiting-care'))
            ->assertDontSee('방문간호지시서', false)
            ->assertDontSee('오늘의 케어 플랜', false);
    }
}
