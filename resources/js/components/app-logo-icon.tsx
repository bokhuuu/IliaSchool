import type { ImgHTMLAttributes } from 'react';

export default function AppLogoIcon(
    props: ImgHTMLAttributes<HTMLImageElement>,
) {
    return (
        <img
            src="/logo.svg"
            alt="ილიას სკოლა"
            className={props.className}
            style={{ borderRadius: '6px' }}
        />
    );
}
