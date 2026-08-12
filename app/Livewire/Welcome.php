<?php

namespace App\Livewire;

use Composer\InstalledVersions;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Welcome extends Component
{
    public int $count = 0;

    public function increment(): void
    {
        $this->count++;
    }

    /**
     * 스택 점검용. 실제 기능 개발 시 이 컴포넌트와 함께 삭제한다.
     *
     * @return array<string, string>
     */
    public function stack(): array
    {
        return [
            'Laravel' => app()->version(),
            'PHP' => PHP_VERSION,
            'Livewire' => InstalledVersions::getPrettyVersion('livewire/livewire'),
            'Database' => $this->database(),
        ];
    }

    private function database(): string
    {
        try {
            $connection = DB::connection();

            return $connection->getDriverName().' '.$connection->getPdo()->getAttribute(\PDO::ATTR_SERVER_VERSION);
        } catch (\Throwable $e) {
            return '연결 실패: '.class_basename($e);
        }
    }

    public function render()
    {
        return view('livewire.welcome');
    }
}
