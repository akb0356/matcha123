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
}
