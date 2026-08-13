<?php

namespace Tests\Feature\Services;

use Tests\TestCase;

class DementiaRespiteTest extends TestCase
{
    public function test_치매가족휴가제_소개_페이지가_열린다(): void
    {
        $response = $this->get(route('services.dementia-respite'));

        $response->assertOk();
        $response->assertSee('당신의 쉼을 응원합니다', false);
    }

    public function test_모든_섹션이_렌더링된다(): void
    {
        $response = $this->get(route('services.dementia-respite'));

        // 아트보드 순서대로 섹션 대표 문구를 확인한다 (Figma 153:2974)
        foreach ([
            '치매가족휴가제 · 종일 돌봄 · 가족 휴식', // 히어로 eyebrow
            '마음 놓고 쉬기 어려우셨죠?',            // S1 고민
            '치매가족휴가제란?',                    // 제도 설명
            '1회 12시간 연속 돌봄',                 // 특징 카드
            '이런 분이 이용할 수 있어요',            // 이용 대상
            '치매 진단을 받은 치매 수급자',          // 체크리스트
            '이용 절차',                           // 이용 절차
            '종일 방문 돌봄',                       // 4단계
            '1회(12시간) 본인부담',                 // 비용
            '치매가족휴가제 자주 묻는 질문',          // FAQ
            '어떤 돌봄이 맞을까요?',                 // 서비스 비교
            '종일 돌봄의 부담',                     // 최종 CTA
            '청담원 재가복지센터',                   // 푸터
        ] as $needle) {
            $response->assertSee($needle, false);
        }
    }

    public function test_faq_5문항의_질문과_답변이_모두_렌더링된다(): void
    {
        $response = $this->get(route('services.dementia-respite'));

        // 답변은 앞부분만 확인한다 (전문은 뷰가 정본)
        foreach ([
            '누가 이용할 수 있나요?' => '장기요양 1·2등급 수급자, 또는 치매 진단을 받은',
            '월 이용 한도액을 다 써도 이용할 수 있나요?' => '매월 이용 한도액과 관계없이 별도로 이용할 수 있습니다.',
            '하루에 몇 시간 돌봐 주나요?' => '1회 12시간 동안 요양보호사가 가정에서',
            '연간 며칠까지 이용할 수 있나요?' => '연 12일 이내에서 이용할 수 있습니다',
            '비용은 얼마인가요?' => '기초생활수급자는 0원, 일반 대상자도 1만 원대 수준입니다.',
        ] as $question => $answer) {
            $response->assertSee($question, false);
            $response->assertSee($answer, false);
        }
    }

    public function test_다른_서비스_페이지로_연결된다(): void
    {
        $this->get(route('services.dementia-respite'))
            ->assertSee(route('services.visiting-nursing'), false)
            ->assertSee(route('services.visiting-care'), false);
    }

    public function test_인력소개_방문기록_후기_섹션은_없다(): void
    {
        // 이 세 섹션은 다른 서비스 페이지에만 있다
        $this->get(route('services.dementia-respite'))
            ->assertDontSee('경력·자격 검증 완료', false)
            ->assertDontSee('보호자 공유됨', false)
            ->assertDontSee('보호자들이 전하는 변화', false);
    }
}
