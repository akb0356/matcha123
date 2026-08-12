# Service Layer

비즈니스 로직은 **전부 이 계층**에 둔다. 컨트롤러와 Livewire 컴포넌트는
입력 검증 → 서비스 호출 → 뷰/응답 반환까지만 담당하고, 도메인 로직을 직접 갖지 않는다.

## 규칙

- 컨트롤러 / Livewire 컴포넌트에 로직 금지. 서비스에 위임한다.
- 서비스는 프레임워크 요청 객체(`Request`)를 받지 않는다. 스칼라 값이나 DTO를 받는다.
- 외부 연동(공단 API 등)은 별도 클라이언트 클래스로 감싸고, 서비스가 그 클라이언트를 주입받는다.
- 트랜잭션 경계는 서비스 안에서 잡는다 (`DB::transaction(...)`).
- 서비스는 생성자 주입으로 의존성을 받는다. 파사드 직접 호출은 최소화한다.

## 디렉터리

```
app/Services/
  <Domain>/
    <Something>Service.php
```

## 예시

```php
// app/Http/Controllers/ExampleController.php
public function store(StoreExampleRequest $request, ExampleService $service)
{
    $example = $service->create($request->validated());

    return redirect()->route('examples.show', $example);
}
```

```php
// app/Livewire/ExampleForm.php
public function save(ExampleService $service): void
{
    $data = $this->validate();

    $service->create($data);

    $this->dispatch('example-saved');
}
```
