<script>
    const searchInputEmployees = document.getElementById('searchInputEmployees');
    const searchInputCreatedTasks = document.getElementById('searchInputCreatedTasks');

    searchInputEmployees.addEventListener('input', () => searchTable('table1'));
    searchInputCreatedTasks.addEventListener('input', () => searchTable('table2'));

    const sortOrders = {}; // Store sorting orders for each column

    function searchTable(tableId) {
        const searchValue = document.getElementById(`searchInput${tableId.charAt(5) === '1' ? 'Employees' : 'CreatedTasks'}`).value.toLowerCase();
        const table = document.getElementById(tableId);
        const rows = table.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const rowData = row.textContent.toLowerCase();
            if (rowData.includes(searchValue)) {
                row.style.display = ""; // Show matching rows
            } else {
                row.style.display = "none"; // Hide non-matching rows
            }
        });
    }

    function sortTable(tableId, columnIndex) {
        const table = document.getElementById(tableId);
        const rows = Array.from(table.querySelectorAll('tbody tr'));

        const sortOrder = sortOrders[columnIndex] || 'asc'; // Get current sorting order or default to 'asc'

        rows.sort((a, b) => {
            const cellA = a.querySelectorAll('td')[columnIndex].innerText;
            const cellB = b.querySelectorAll('td')[columnIndex].innerText;

            if (sortOrder === 'asc') {
                return cellA.localeCompare(cellB, undefined, {
                    numeric: true,
                    sensitivity: 'base'
                });
            } else {
                return cellB.localeCompare(cellA, undefined, {
                    numeric: true,
                    sensitivity: 'base'
                });
            }
        });

        // Toggle sorting order for the column
        sortOrders[columnIndex] = sortOrder === 'asc' ? 'desc' : 'asc';

        const tbody = table.querySelector('tbody');
        rows.forEach(row => {
            tbody.appendChild(row);
        });
    }

    const tableHeadersEmployees = document.querySelectorAll('#table1 th');
    const tableHeadersCreatedTasks = document.querySelectorAll('#table2 th');

    tableHeadersEmployees.forEach((header, headerIndex) => {
        header.addEventListener('click', () => {
            sortTable('table1', headerIndex);
        });
    });

    tableHeadersCreatedTasks.forEach((header, headerIndex) => {
        header.addEventListener('click', () => {
            sortTable('table2', headerIndex);
        });
    });
</script>