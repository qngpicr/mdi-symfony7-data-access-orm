document.addEventListener("DOMContentLoaded", () => {
    fetch("/api/cpus")
        .then(res => res.json())
        .then(data => {
            const tbody = document.getElementById("cpuBody");
            tbody.innerHTML = "";
            if (data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="9" class="text-center text-muted">데이터가 없습니다.</td></tr>';
            } else {
                data.forEach(cpu => {
                    tbody.innerHTML += `
                        <tr>
                            <td>${cpu.id_cpu}</td>
                            <td>${cpu.name_cpu}</td>
                            <td>${cpu.release_cpu}</td>
                            <td>${cpu.core_cpu}</td>
                            <td>${cpu.thread_cpu}</td>
                            <td>${cpu.maxghz_cpu}</td>
                            <td>${cpu.minghz_cpu}</td>
                            <td>${cpu.type_code_cpu}</td>
                            <td>${cpu.manf_code_cpu}</td>
                        </tr>`;
                });
            }
        })
        .catch(err => console.error("CPU 데이터 로딩 실패:", err));
});
