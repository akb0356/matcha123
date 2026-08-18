<?php

namespace Tests\Feature;

use Tests\TestCase;

class CareersCultureTest extends TestCase
{
    public function test_페이지가_열린다(): void
    {
        $response = $this->get(route('careers.culture'));

        $response->assertOk();
        $response->assertSee('청담원에서 일한다는 것', false);
    }

    public function test_모든_섹션이_렌더링된다(): void
    {
        $response = $this->get(route('careers.culture'));

        // 아트보드 순서대로 섹션 대표 문구를 확인한다 (Figma 180:2725)
        foreach ([
            '복지부터 성장까지, 오래 함께할 이유를 소개합니다', // 히어로
            '일하는 사람을 먼저 돌봅니다',                    // 복지
            '청담원과 함께하는 사람들',                       // 후기
            '함께 할수록 더 단단해지는 길',                    // 커리어 단계
            '마음이 움직이셨다면',                            // CTA 띠
            '청담원 재가복지센터',                            // 푸터
        ] as $needle) {
            $response->assertSee($needle, false);
        }
    }

    public function test_복지_6가지와_커리어_4단계가_들어간다(): void
    {
        $response = $this->get(route('careers.culture'));

        foreach ([
            '경력 단계별 수당', '월 24시간 유급 교육', '4대보험 + 상해보험',
            '24시간 핫라인', '심리상담 (EAP)', '거리 수당',
        ] as $benefit) {
            $response->assertSee($benefit, false);
        }

        foreach (['STEP 01', 'STEP 02', 'STEP 03', 'STEP 04'] as $step) {
            $response->assertSee($step, false);
        }
    }

    /**
     * 두 버튼(히어로·하단 띠) 모두 채용 공고 목록으로 돌아간다.
     */
    public function test_버튼_두_개가_채용공고로_돌아간다(): void
    {
        $html = $this->get(route('careers.culture'))->getContent();

        // 헤더 GNB 에도 같은 링크가 있으므로 <main> 안만 센다
        $main = substr(
            $html,
            (int) strpos($html, '<main>'),
            (int) strpos($html, '</main>') - (int) strpos($html, '<main>')
        );

        $this->assertSame(
            2,
            substr_count($main, 'href="'.route('careers').'"'),
            '채용 공고로 가는 링크가 2개여야 한다'
        );
        $this->assertStringContainsString('채용 공고 보기', $html);
        $this->assertStringContainsString('채용 공고 보러 가기', $html);
    }

    public function test_채용_페이지에서_이_페이지로_연결된다(): void
    {
        $this->get(route('careers'))
            ->assertSee(route('careers.culture'), false);
    }

    public function test_히어로_이미지가_프레임_비율과_맞는다(): void
    {
        $file = public_path('images/careers/hero-culture.jpg');
        $this->assertFileExists($file);

        [$w, $h] = getimagesize($file);
        $this->assertEqualsWithDelta(1920 / 570, $w / $h, 0.02, "히어로 비율이 다르다 ({$w}x{$h})");
    }
}
