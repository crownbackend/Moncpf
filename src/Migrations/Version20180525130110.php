<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180525130110 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE complement_info ADD identity_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE complement_info ADD CONSTRAINT FK_70DFE1AF25DB70FD FOREIGN KEY (identity_user_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_70DFE1AF25DB70FD ON complement_info (identity_user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE complement_info DROP FOREIGN KEY FK_70DFE1AF25DB70FD');
        $this->addSql('DROP INDEX UNIQ_70DFE1AF25DB70FD ON complement_info');
        $this->addSql('ALTER TABLE complement_info DROP identity_user_id');
    }
}
