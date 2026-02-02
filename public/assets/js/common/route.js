document.addEventListener("DOMContentLoaded", () => {
    fetch("/routes")
        .then(res => res.json())
        .then(data => {
            const otherBody = document.getElementById('otherRoutes');
            const apiBody = document.getElementById('apiRoutes');
            const csrBody = document.getElementById('csrRoutes');
            const ssrBody = document.getElementById('ssrRoutes');

            otherBody.innerHTML = '';
            apiBody.innerHTML = '';
            csrBody.innerHTML = '';
            ssrBody.innerHTML = '';

            // URI 기준 오름차순 정렬
            data.sort((a, b) => a.uri.localeCompare(b.uri));

            // 그룹별 출력
            data.forEach(route => {
                const row = `
                    <tr>
                        <td class="method-col"><strong style="color:black;">${route.method}</strong></td>
                        <td class="uri-col"><a href="/${route.uri}">/${route.uri}</a></td>
                    </tr>`;

                if (route.uri.startsWith("api")) {
                    apiBody.insertAdjacentHTML('beforeend', row);
                } else if (route.uri.startsWith("csr")) {
                    csrBody.insertAdjacentHTML('beforeend', row);
                } else if (route.uri.startsWith("ssr")) {
                    ssrBody.insertAdjacentHTML('beforeend', row);
                } else {
                    otherBody.insertAdjacentHTML('beforeend', row);
                }
            });
        })
        .catch(err => console.error("라우트 정보 로딩 실패:", err));
});
