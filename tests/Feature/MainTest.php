<?php

namespace Tests\Feature;

use Tests\TestCase;

class MainTest extends TestCase
{
    public function test_메인_페이지가_열린다(): void
    {
        $response = $this->get(route('main'));

        $response->assertOk();
        $response->assertSee('재가복지서비스부터', false);
    }

    public function test_모든_섹션이_렌더링된다(): void
    {
        $response = $this->get(route('main'));

        // 아트보드 순서대로 섹션 대표 문구를 확인한다 (Figma 20:1043)
        foreach ([
            '가족의 진심에, 전문성을 더합니다',        // 히어로
            '누적 상담 건수',                        // 히어로 지표 바
            '청담원 사업 소개',                      // sec2
            '알 수 없었던 경험이 있으신가요?',         // sec3
            '간편하고 투명한 확인',                   // sec4
            '으로 옮겨가고 있습니다',                 // sec5
            '청담원은 간호와 요양을 잇습니다',         // sec6
            '보호자의 안심과 센터의 운영까지',         // sec8
            '먼저 이용해보신 가족들의 이야기',         // sec9
            '이라 믿습니다',                         // sec10
            '청담원 재가복지센터',                    // 푸터
        ] as $needle) {
            $response->assertSee($needle, false);
        }
    }

    public function test_서비스_페이지_4종으로_연결된다(): void
    {
        $response = $this->get(route('main'));

        foreach ([
            'services.visiting-nursing',
            'services.visiting-care',
            'services.visiting-bath',
            'services.dementia-respite',
        ] as $name) {
            $response->assertSee(route($name), false);
        }
    }

    public function test_서비스_페이지의_로고가_메인으로_연결된다(): void
    {
        foreach ([
            'services.visiting-nursing',
            'services.visiting-care',
            'services.visiting-bath',
            'services.dementia-respite',
        ] as $name) {
            $this->get(route($name))->assertSee('href="'.route('main').'"', false);
        }
    }

    public function test_인터랙션_요소가_들어있다(): void
    {
        $response = $this->get(route('main'));

        // 카운트업 대상 3개 (sec5)
        $response->assertSee('data-countup="62.6"', false);
        $response->assertSee('data-countup="2"', false);
        $response->assertSee('data-countup="116.5"', false);

        // 화면 탭 (sec8)
        $response->assertSee('보호자 화면', false);
        $response->assertSee('관리자 화면', false);
        $response->assertSee('수급자 증감 실시간 확인', false);

        // 문제 제기 호버 문구 (sec3)
        $response->assertSee('방문 일정이 제대로', false);
        $response->assertSee('담당 요양보호사가 바뀌어도', false);
    }
}
