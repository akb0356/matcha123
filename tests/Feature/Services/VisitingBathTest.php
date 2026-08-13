<?php

namespace Tests\Feature\Services;

use Tests\TestCase;

class VisitingBathTest extends TestCase
{
    public function test_방문목욕_소개_페이지가_열린다(): void
    {
        $response = $this->get(route('services.visiting-bath'));

        $response->assertOk();
        $response->assertSee('씻는 일의 어려움', false);
    }

    public function test_모든_섹션이_렌더링된다(): void
    {
        $response = $this->get(route('services.visiting-bath'));

        // 아트보드 순서대로 섹션 대표 문구를 확인한다 (Figma 153:2439)
        foreach ([
            '방문목욕 · 2인 1조 안전 목욕 지원',        // 히어로 eyebrow
            '집에서 돌보는 일',                       // S1 고민
            '2인 1조로 찾아갑니다',                   // 목욕 전문 인력
            '목욕 전문 인력이 활동 중이에요',           // 검증 인원 캡션
            '상태를 꼼꼼히 살펴 전해드려요',            // 방문 기록
            '목욕 상태',                             // 방문 기록 지표
            '전문 장비와 2인 케어로 미끄러짐 걱정 없이', // 안전 점검
            '방문 전 안전 점검',                      // 안전 점검 카드
            '오늘의 목욕 케어',                       // 목욕 케어 카드
            '보호자들이 전하는 변화',                  // 후기
            '생각보다 부담은 크지 않아요',              // 비용
            '방문목욕 자주 묻는 질문',                 // FAQ
            '어떤 돌봄이 맞을까요?',                   // 서비스 비교
            '집에서 받는 안전한 목욕',                 // 최종 CTA
            '청담원 재가복지센터',                     // 푸터
        ] as $needle) {
            $response->assertSee($needle, false);
        }
    }

    public function test_세_서비스_페이지가_서로_연결된다(): void
    {
        $nursing = route('services.visiting-nursing');
        $care = route('services.visiting-care');
        $bath = route('services.visiting-bath');

        $this->get($bath)->assertSee($nursing, false)->assertSee($care, false);
        $this->get($nursing)->assertSee($care, false)->assertSee($bath, false);
        $this->get($care)->assertSee($nursing, false)->assertSee($bath, false);
    }

    public function test_faq_5문항의_질문과_답변이_모두_렌더링된다(): void
    {
        $response = $this->get(route('services.visiting-bath'));

        // 답변은 앞부분만 확인한다 (전문은 뷰가 정본)
        foreach ([
            '장기요양등급이 없어도 신청할 수 있나요?' => '네, 가능합니다.',
            '목욕은 어디에서 진행되나요?' => '목욕설비를 갖춘 차량 안에서 하거나',
            '요양보호사 몇 분이 오시나요?' => '원칙적으로 요양보호사 2인이 함께 방문합니다.',
            '거동이 전혀 안 되셔도 가능한가요?' => '누워 계신 어르신도 이동식 욕조와 보조 장비로',
            '본인부담금은 어떻게 결정되나요?' => '이용 횟수에 따라 달라집니다.',
        ] as $question => $answer) {
            $response->assertSee($question, false);
            $response->assertSee($answer, false);
        }
    }

    public function test_다른_서비스_전용_섹션은_없다(): void
    {
        $this->get(route('services.visiting-bath'))
            ->assertDontSee('방문간호지시서', false)   // 방문간호 전용
            ->assertDontSee('오늘의 케어 플랜', false); // 방문간호 전용
    }
}
