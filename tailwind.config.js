import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './app/Livewire/**/*.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Pretendard Variable', 'Pretendard', ...defaultTheme.fontFamily.sans],
            },

            /*
             * 아래 색상·타이포는 Figma 「청담원」 파일의 디자인 변수를 그대로 옮긴 것이다.
             * 토큰 이름을 Figma 쪽과 1:1로 맞춰 두었으니 디자인이 바뀌면 여기만 고친다.
             * 원본: Figma sIDsDQere8geTVIKciOGxh (get_variable_defs)
             */
            colors: {
                // Label/*
                label: {
                    DEFAULT: '#111111',        // label-normal
                    neutral: '#303030',        // label-neutral
                    alt: '#858585',            // label-alternative
                    assistive: '#c2c2c2',      // 디자인에서 보조 라벨로 쓰인 값 (변수 미등록)
                    inverse: '#f8f8f8',        // inverse-label
                },
                // Background/*
                surface: {
                    DEFAULT: '#ffffff',        // background-normal
                    alt: '#f9f9f9',            // background-alternative
                    inverse: '#202020',        // inverse-background
                },
                // Line/*
                line: {
                    neutral: 'rgba(133, 133, 133, 0.16)', // line-normal-neutral
                    divider: '#ebebeb',
                    // 장기요양등급 안내의 카드 테두리·구분선 (변수 미등록)
                    soft: '#f5f5f5',
                },
                // Fill/*
                fill: {
                    alt: 'rgba(133, 133, 133, 0.05)',     // fill-alternative
                },
                // Primary/*
                primary: {
                    DEFAULT: '#3694ab',
                    strong: '#04718b',
                    heavy: '#054e60',          // primary-heavy
                    semistrong: '#377e95',
                    soft: '#f1f8f9',           // primary-soft
                    inverse: '#b8dce4',        // inverse-primary
                },
                // Status/*
                caution: '#ff9200',           // status-cautionary
                info: '#005eeb',              // 「발급 완료」 배지 (변수 미등록)
                // Accent/*
                accent: {
                    violet: '#5b37ed',
                    'light-blue': '#008dcf',
                    // 치매가족휴가제는 글자·CTA에 green, 섹션 배경 틴트에 green-soft 를 쓴다.
                    green: { DEFAULT: '#009632', soft: '#1ab94f' },
                },
            },

            /*
             * Figma의 font/* 토큰. 이름 규칙은 [weight 약어][size]이며
             * 크기·행간·자간·굵기를 한 클래스로 묶는다. 예: text-eb40
             */
            fontSize: {
                eb72: ['72px', { lineHeight: '1.2', letterSpacing: '-2.88px', fontWeight: '800' }],
                // Figma 토큰에는 없다. 최종 CTA 제목이 좁은 화면에서 72px으로 너무 커서
                // 모바일·태블릿용으로 추가했다 (text-eb44 lg:text-eb72).
                eb44: ['44px', { lineHeight: '1.2', letterSpacing: '-1.76px', fontWeight: '800' }],
                eb52: ['52px', { lineHeight: '1.2', letterSpacing: '-2.88px', fontWeight: '800' }],
                eb40: ['40px', { lineHeight: '1.2', letterSpacing: '-2.88px', fontWeight: '800' }],
                eb30: ['30px', { lineHeight: '1.2', letterSpacing: '-2.88px', fontWeight: '800' }],
                b24: ['24px', { lineHeight: '1.2', letterSpacing: '-0.5px', fontWeight: '700' }],
                b20: ['20px', { lineHeight: '1.2', letterSpacing: '-0.5px', fontWeight: '700' }],
                m20: ['20px', { lineHeight: '1.5', letterSpacing: '-0.5px', fontWeight: '500' }],
                r20: ['20px', { lineHeight: '1.5', letterSpacing: '-0.5px', fontWeight: '400' }],
                b16: ['16px', { lineHeight: '1.2', letterSpacing: '-0.5px', fontWeight: '700' }],
                m16: ['16px', { lineHeight: '1.5', letterSpacing: '-0.5px', fontWeight: '500' }],
                r16: ['16px', { lineHeight: '1.5', letterSpacing: '-0.5px', fontWeight: '400' }],
                b14: ['14px', { lineHeight: '1.2', letterSpacing: '-0.5px', fontWeight: '700' }],
                m14: ['14px', { lineHeight: '1.5', letterSpacing: '-0.5px', fontWeight: '500' }],
                r14: ['14px', { lineHeight: '1.5', letterSpacing: '-0.5px', fontWeight: '400' }],
                m12: ['12px', { lineHeight: '1.5', letterSpacing: '-0.5px', fontWeight: '500' }],
            },

            maxWidth: {
                /*
                 * 1920px 아트보드에서 좌우 여백 432px을 뺀 콘텐츠 폭은 1056px이다.
                 * 섹션은 `max-w-content px-6`으로 쓰므로 좌우 패딩 24px씩을 더한 값을 담는다.
                 * (1056 + 48 = 1104) → 넓은 화면에서 실제 콘텐츠 폭이 디자인과 정확히 같아진다.
                 */
                content: '1104px',
            },

            boxShadow: {
                'elevation-xs': '0 1px 2px -1px rgba(23, 23, 23, 0.1)',
                'card-hi': '0 6px 20px 0 rgba(0, 0, 0, 0.08)',
                'card-lo': '0 2px 8px 0 rgba(0, 0, 0, 0.04)',
                panel: '0 10px 15px 0 rgba(0, 0, 0, 0.08)',
            },
        },
    },
    plugins: [],
};
