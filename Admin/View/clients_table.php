<?php if (!empty($clients)): ?>
    <div class="client-table">
        <h3>Current Clients</h3>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($client['username']); ?></td>
                        <td><?php echo htmlspecialchars($client['email']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="client-table">
        <h3>Current Clients</h3>
        <p>No clients found.</p>
    </div>
<?php endif; ?>