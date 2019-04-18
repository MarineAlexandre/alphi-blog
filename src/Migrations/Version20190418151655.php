<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190418151655 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, user_id INT NOT NULL, answer LONGTEXT NOT NULL, date DATETIME NOT NULL, INDEX IDX_DADD4A251E27F6BF (question_id), INDEX IDX_DADD4A25A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, theme_id INT NOT NULL, title VARCHAR(50) NOT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_23A0E6659027487 (theme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, article_id INT NOT NULL, comment LONGTEXT NOT NULL, date DATETIME NOT NULL, INDEX IDX_9474526CA76ED395 (user_id), INDEX IDX_9474526C7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE like_answer (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE like_answer_answer (like_answer_id INT NOT NULL, answer_id INT NOT NULL, INDEX IDX_CA96B9FD8293C465 (like_answer_id), INDEX IDX_CA96B9FDAA334807 (answer_id), PRIMARY KEY(like_answer_id, answer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE like_answer_user (like_answer_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_607DDB078293C465 (like_answer_id), INDEX IDX_607DDB07A76ED395 (user_id), PRIMARY KEY(like_answer_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE like_comment (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE like_comment_comment (like_comment_id INT NOT NULL, comment_id INT NOT NULL, INDEX IDX_2D18CDE35BFDDDEB (like_comment_id), INDEX IDX_2D18CDE3F8697D13 (comment_id), PRIMARY KEY(like_comment_id, comment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE like_comment_user (like_comment_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_A1161F6C5BFDDDEB (like_comment_id), INDEX IDX_A1161F6CA76ED395 (user_id), PRIMARY KEY(like_comment_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, theme_id INT NOT NULL, question LONGTEXT NOT NULL, closed TINYINT(1) NOT NULL, INDEX IDX_B6F7494E59027487 (theme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_answer (id INT AUTO_INCREMENT NOT NULL, answer_id INT NOT NULL, user_id INT NOT NULL, sub_answer LONGTEXT NOT NULL, date DATETIME NOT NULL, INDEX IDX_688C0569AA334807 (answer_id), INDEX IDX_688C0569A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(30) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_9775E70812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A251E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6659027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE like_answer_answer ADD CONSTRAINT FK_CA96B9FD8293C465 FOREIGN KEY (like_answer_id) REFERENCES like_answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE like_answer_answer ADD CONSTRAINT FK_CA96B9FDAA334807 FOREIGN KEY (answer_id) REFERENCES answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE like_answer_user ADD CONSTRAINT FK_607DDB078293C465 FOREIGN KEY (like_answer_id) REFERENCES like_answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE like_answer_user ADD CONSTRAINT FK_607DDB07A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE like_comment_comment ADD CONSTRAINT FK_2D18CDE35BFDDDEB FOREIGN KEY (like_comment_id) REFERENCES like_comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE like_comment_comment ADD CONSTRAINT FK_2D18CDE3F8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE like_comment_user ADD CONSTRAINT FK_A1161F6C5BFDDDEB FOREIGN KEY (like_comment_id) REFERENCES like_comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE like_comment_user ADD CONSTRAINT FK_A1161F6CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E59027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('ALTER TABLE sub_answer ADD CONSTRAINT FK_688C0569AA334807 FOREIGN KEY (answer_id) REFERENCES answer (id)');
        $this->addSql('ALTER TABLE sub_answer ADD CONSTRAINT FK_688C0569A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE theme ADD CONSTRAINT FK_9775E70812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('DROP INDEX NICKNAME ON user');
        $this->addSql('DROP INDEX LOGIN ON user');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE like_answer_answer DROP FOREIGN KEY FK_CA96B9FDAA334807');
        $this->addSql('ALTER TABLE sub_answer DROP FOREIGN KEY FK_688C0569AA334807');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C7294869C');
        $this->addSql('ALTER TABLE theme DROP FOREIGN KEY FK_9775E70812469DE2');
        $this->addSql('ALTER TABLE like_comment_comment DROP FOREIGN KEY FK_2D18CDE3F8697D13');
        $this->addSql('ALTER TABLE like_answer_answer DROP FOREIGN KEY FK_CA96B9FD8293C465');
        $this->addSql('ALTER TABLE like_answer_user DROP FOREIGN KEY FK_607DDB078293C465');
        $this->addSql('ALTER TABLE like_comment_comment DROP FOREIGN KEY FK_2D18CDE35BFDDDEB');
        $this->addSql('ALTER TABLE like_comment_user DROP FOREIGN KEY FK_A1161F6C5BFDDDEB');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A251E27F6BF');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6659027487');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E59027487');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE like_answer');
        $this->addSql('DROP TABLE like_answer_answer');
        $this->addSql('DROP TABLE like_answer_user');
        $this->addSql('DROP TABLE like_comment');
        $this->addSql('DROP TABLE like_comment_comment');
        $this->addSql('DROP TABLE like_comment_user');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE sub_answer');
        $this->addSql('DROP TABLE theme');
        $this->addSql('CREATE UNIQUE INDEX NICKNAME ON user (nickname)');
        $this->addSql('CREATE UNIQUE INDEX LOGIN ON user (login)');
    }
}
