<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:database-backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the database using mysqldump';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Database configuration
        $dbHost = config('database.connections.mysql.host');
        $dbUsername = config('database.connections.mysql.username');
        $dbPassword = config('database.connections.mysql.password');
        $dbName = config('database.connections.mysql.database');
        
        // Backup path
        $backupPath = storage_path('app/backups/' . date('Y-m-d_H-i-s') . '.sql');

        // Create directory if it does not exist
        if (!file_exists(dirname($backupPath))) {
            mkdir(dirname($backupPath), 0777, true);
        }

        // Execute the mysqldump command
        $command = "mysqldump --host={$dbHost} --user={$dbUsername} --password={$dbPassword} {$dbName} > {$backupPath}";
        exec($command);

        // Output message
        $this->info('Database backup completed successfully.');
    }
}