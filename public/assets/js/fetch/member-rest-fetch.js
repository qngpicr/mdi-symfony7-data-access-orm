document.addEventListener("DOMContentLoaded", () => {
    fetch("/api/members")
        .then(res => res.json())
        .then(data => {
            const tbody = document.getElementById("memberBody");
            tbody.innerHTML = "";
            if (data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="13" class="text-center text-muted">데이터가 없습니다.</td></tr>';
            } else {
                data.forEach(member => {
                    tbody.innerHTML += `
                        <tr>
                            <td>${member.id_member}</td>
                            <td>${member.id}</td>
                            <td>${member.pass}</td>
                            <td>${member.name}</td>
                            <td>${member.email}</td>
                            <td>${member.regist_day}</td>
                            <td>${member.role}</td>
                            <td>${member.status}</td>
                            <td>${member.email_verified}</td>
                            <td>${member.fail_count}</td>
                            <td>${member.last_login}</td>
                            <td>${member.updated_at}</td>
                            <td>${member.deleted_at}</td>
                        </tr>`;
                });
            }
        })
        .catch(err => console.error("Member 데이터 로딩 실패:", err));
});
