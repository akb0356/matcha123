<?php

namespace Tests\Feature\Site;

use Tests\TestCase;

class HeaderNavTest extends TestCase
{
    public function test_메가_드롭다운에_서비스_4종이_들어간다(): void
    {
        $response = $this->get(route('services.visiting-nursing'));

        foreach (['방문간호', '방문요양', '방문목욕', '치매가족휴가제'] as $service) {
            $response->assertSee($service, false);
        }
    }

    public function test_메가_드롭다운에_비용_지원_하위메뉴가_들어간다(): void
    {
        $response = $this->get(route('services.visiting-nursing'));

        foreach (['장기요양등급', '본인부담금 안내', '비용 계산기'] as $item) {
            $response->assertSee($item, false);
        }
    }

    public function test_서비스_하위메뉴가_실제_라우트로_연결된다(): void
    {
        $response = $this->get(route('services.visiting-bath'));

        $response->assertSee(route('services.visiting-nursing'), false);
        $response->assertSee(route('services.visiting-care'), false);
        $response->assertSee(route('services.visiting-bath'), false);
    }

    /**
     * 헤더는 모든 페이지에서 스크롤 시 상단에 붙고 하단 1px 선을 갖는다.
     *
     * fixed 가 아니라 sticky 인 이유: 흐름에서 빠지지 않아 히어로가 헤더 밑으로
     * 밀려 들어가지 않는다. 조상에 overflow 가 생기면 깨지므로 함께 막는다.
     */
    public function test_헤더가_모든_페이지에서_상단에_고정되고_하단_선을_갖는다(): void
    {
        $routes = [
            'main',
            'services.visiting-nursing',
            'services.visiting-care',
            'services.visiting-bath',
            'services.dementia-respite',
            'services.platform',
            'support.long-term-care-grade',
            'support.copayment',
        ];

        foreach ($routes as $name) {
            $html = $this->get(route($name))->getContent();

            $this->assertStringContainsString(
                'sticky top-0 z-50 w-full border-b border-line-divider bg-surface',
                $html,
                "$name 헤더에 sticky 또는 하단선 클래스가 없다"
            );

            // sticky 는 조상에 overflow 가 걸리면 동작하지 않는다
            // Livewire 가 wire:snapshot 을 끼워 넣으므로 클래스만 확인한다
            $this->assertStringContainsString('class="bg-surface"', $html);
            $this->assertStringNotContainsString('bg-surface overflow', $html);
        }
    }
}
