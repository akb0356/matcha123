<?php

namespace Tests\Feature\Services;

use Tests\TestCase;

class PlatformTest extends TestCase
{
    public function test_페이지가_열린다(): void
    {
        $response = $this->get(route('services.platform'));

        $response->assertOk();
        $response->assertSee('한 곳에서 끝냅니다', false);
    }

    public function test_모든_섹션이_렌더링된다(): void
    {
        $response = $this->get(route('services.platform'));

        // 아트보드 순서대로 섹션 대표 문구를 확인한다 (Figma 180:3115)
        foreach ([
            '청담원 플랫폼 · 센터 운영 통합 관리',   // 히어로
            '이 세 곳에서 새고 있지 않으신가요?',    // 고민
            '하나의 축으로 잇습니다',               // 3대 주축
            '센터의 운영까지',                      // 화면 소개
            '각자 얻는 것이 분명합니다',            // 대상별 가치
            '도입은 4단계, 평균 2주면 시작합니다',   // 도입 단계
            '도입 부담은 생각보다 가볍습니다',       // 비용
            '청담원 플랫폼 자주 묻는 질문',          // FAQ
            '지금 도입 문의하세요',                 // 최종 CTA
            '청담원 재가복지센터',                  // 푸터
        ] as $needle) {
            $response->assertSee($needle, false);
        }
    }

    public function test_4대_기능이_들어간다(): void
    {
        $response = $this->get(route('services.platform'));

        foreach (['01 환자연계', '02 케어플랜', '03 구인구직', '04 상담(리드) 관리'] as $pillar) {
            $response->assertSee($pillar, false);
        }
    }

    public function test_fa_q_답변_5개가_모두_채워져_있다(): void
    {
        $response = $this->get(route('services.platform'));

        foreach ([
            '양식에 맞춰 일괄 이관해 드립니다',
            '가맹은 센터를 새로 여는 분을 위한 창업 지원이고',
            '활동하시는 지역의 연계 현황을 확인해',
            '첫 상담부터의 이력이 그대로 남습니다',
            '공고 등록부터 지원자 접수, 서류 검토, 면접, 채용 확정까지',
        ] as $answer) {
            $response->assertSee($answer, false);
        }
    }

    public function test_gn_b_서비스에서_치매가족휴가제_다음에_온다(): void
    {
        $html = $this->get(route('main'))->getContent();

        $respite = strpos($html, route('services.dementia-respite'));
        $platform = strpos($html, route('services.platform'));

        $this->assertNotFalse($platform, '청담원 플랫폼 링크가 GNB에 없다');
        $this->assertGreaterThan($respite, $platform, '치매가족휴가제보다 뒤에 와야 한다');
    }

    public function test_최종_ct_a가_72_20_16_이다(): void
    {
        $response = $this->get(route('services.platform'));

        $response->assertSee('text-eb44 text-surface lg:text-eb72', false);
        $response->assertSee('text-b20 text-white/80', false);
        $response->assertSee('text-b16 text-primary-heavy', false);
    }
}
