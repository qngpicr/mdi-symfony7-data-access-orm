document.addEventListener("DOMContentLoaded", () => {
    fetch("/api/devices")
        .then(res => res.json())
        .then(data => {
            const tbody = document.getElementById("deviceBody");
            tbody.innerHTML = "";
            if (data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="8" class="text-center text-muted">데이터가 없습니다.</td></tr>';
            } else {
                data.forEach(device => {
                    tbody.innerHTML += `
                        <tr>
                            <td>${device.id_device}</td>
                            <td>${device.name_device}</td>
                            <td>${device.id_cpu}</td>
                            <td>${device.lineup_device}</td>
                            <td>${device.release_device}</td>
                            <td>${device.weight_device}</td>
                            <td>${device.type_code_device}</td>
                            <td>${device.manf_code_device}</td>
                        </tr>`;
                });
            }
        })
        .catch(err => console.error("Device 데이터 로딩 실패:", err));
});
