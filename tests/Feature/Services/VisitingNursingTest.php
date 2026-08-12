<?php

namespace Tests\Feature\Services;

use Tests\TestCase;

class VisitingNursingTest extends TestCase
{
    public function test_방문간호_소개_페이지가_열린다(): void
    {
        $response = $this->get(route('services.visiting-nursing'));

        $response->assertOk();
        $response->assertSee('가족의 진심에', false);
    }

    public function test_모든_섹션이_렌더링된다(): void
    {
        $response = $this->get(route('services.visiting-nursing'));

        // 아트보드 순서대로 섹션 대표 문구를 확인한다 (Figma 153:1424)
        foreach ([
            '집에서 돌보는 일',                 // S1 고민
            '전문 간호사가 찾아갑니다',          // 간호사 소개
            '무엇을 했는지 다 보여드려요',        // 방문 기록
            '의사 지시에 따라 집에서 안전하게',   // 지시서·케어 플랜
            '보호자들이 전하는 변화',            // 후기
            '생각보다 부담은 크지 않아요',        // 비용
            '방문간호 자주 묻는 질문',           // FAQ
            '어떤 돌봄이 맞을까요?',             // 서비스 비교
            '지금 무료로 상담해 보세요',          // 최종 CTA
            '청담원 재가복지센터',               // 푸터
        ] as $needle) {
            $response->assertSee($needle, false);
        }
    }

    public function test_faq_5문항의_질문과_답변이_모두_렌더링된다(): void
    {
        $response = $this->get(route('services.visiting-nursing'));

        // 답변은 앞부분만 확인한다 (전문은 뷰가 정본)
        foreach ([
            '장기요양등급이 없어도 신청할 수 있나요?' => '네, 가능합니다.',
            '담당 간호사 한 분이 계속 방문하나요?' => '가능한 한 같은 간호사가 정기적으로 방문하도록 배정합니다.',
            '담당 간호사를 변경할 수 있나요?' => '어르신과 잘 맞지 않거나 불편한 점이 있으면',
            '가족이 직접 돌봄에 참여할 수도 있나요?' => '간호 자격을 가진 가족이라면 가족간호 형태로',
            '본인부담금은 어떻게 결정되나요?' => '본인부담 구분(일반·감경·기초수급)',
        ] as $question => $answer) {
            $response->assertSee($question, false);
            $response->assertSee($answer, false);
        }
    }
}
