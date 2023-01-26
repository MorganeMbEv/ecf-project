<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230125135713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, date DATE NOT NULL, phone_number INT NOT NULL, email_adress VARCHAR(255) NOT NULL, guest_number INT NOT NULL, booking_time TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE max_customers (id INT AUTO_INCREMENT NOT NULL, threshold_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening_hours (id INT AUTO_INCREMENT NOT NULL, day VARCHAR(50) NOT NULL, status LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', lunch_opening TIME NOT NULL, lunch_closing TIME NOT NULL, dinner_opening TIME NOT NULL, dinner_closing TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE max_customers');
        $this->addSql('DROP TABLE opening_hours');
    }
}
